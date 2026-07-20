# Hướng Dẫn Cấu Hình Docker Cho CodeIgniter 4

Các file cấu hình Docker trong dự án đã được cập nhật để tối ưu hóa quyền đọc/ghi file trên máy host của lập trình viên, tránh tình trạng không chỉnh sửa được file trong thư mục `public` hay `writable`.

## 📁 Các File Cấu Hình Chính

1. **`Dockerfile`**: Build image cho PHP-FPM 8.2, cài đặt sẵn các extension PHP cần thiết cho CodeIgniter 4 (`intl`, `gd`, `zip`, `pdo_mysql`, `mysqli`, `mbstring`, ...). PHP-FPM được chạy trực tiếp để tránh xung đột quyền.
2. **`nginx/default.conf`**: Cấu hình Nginx định hướng thư mục root vào `public` và cấu hình rewrite rule phục vụ rewrite URL của CodeIgniter 4.
3. **`docker-compose.yml`**: Định nghĩa 4 service hoạt động cùng nhau:
   * **`app`**: Chạy PHP-FPM 8.2 dưới quyền của user host (thông qua UID/GID động).
   * **`webserver`**: Chạy container Nginx (Port **8080**).
   * **`db`**: Chạy container MariaDB 10.11 (Port **3306**).
   * **`phpmyadmin`**: Quản lý database trực quan (Port **8081**).

---

## ⚙️ Cấu Hình File `.env` Trong Dự Án

Để dự án hoạt động chính xác và không bị lỗi quyền ghi file (Permission Denied):

1. Tạo file `.env` từ file `.env.example` (nếu chưa có).
2. Thêm hoặc cập nhật cấu hình UID/GID ở cuối file `.env`:
   ```env
   # Khai báo UID/GID của user trên máy host (chạy lệnh `id -u` và `id -g` để lấy giá trị)
   DOCKER_UID=1000
   DOCKER_GID=1000
   ```
3. Cấu hình Database kết nối tới service `db`:
   ```env
   app.baseURL = 'http://localhost:8080/'

   database.default.hostname = db
   database.default.database = autostyle
   database.default.username = root
   database.default.password = root_password
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

*(Lưu ý: Mọi file do PHP-FPM sinh ra trong container giờ đây sẽ thuộc sở hữu của chính user của bạn trên máy host, giúp bạn chỉnh sửa/xóa thoải mái mà không cần sudo).*

---

## 🚀 Hướng Dẫn Chạy Dự Án

Mở terminal tại thư mục dự án và thực hiện các lệnh sau:

### 1. Khởi động các Container
Để build và chạy các container ở chế độ chạy ngầm:
```bash
docker compose up -d --build
```

### 2. Kiểm tra trạng thái các Container
```bash
docker compose ps
```

### 3. Các đường dẫn truy cập
* **Website (CodeIgniter 4)**: [http://localhost:8080](http://localhost:8080)
* **phpMyAdmin**: [http://localhost:8081](http://localhost:8081)
  * *Username*: `root`
  * *Password*: `root_password`

### 4. Tắt các container khi không sử dụng
```bash
docker compose down
```

---

## 🛠️ Một Số Lệnh Hữu Ích Khi Phát Triển

* **Chạy `composer install` qua Docker (sử dụng đúng UID của bạn):**
  ```bash
  docker compose exec app composer install
  ```

* **Chạy các lệnh Spark của CodeIgniter 4 (ví dụ: chạy Migration):**
  ```bash
  docker compose exec app php spark migrate
  ```

* **Vào trong terminal của container PHP:**
  ```bash
  docker compose exec app bash
  ```
