<!-- Floating Action Buttons -->
<div class="sy-floating-actions">
	<!-- Q&A Button -->
	<a href="<?= base_url('medical/support') ?>" class="floating-btn btn-qa" title="의료진 문의 / Q&A 바로가기">
		<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="floating-btn-icon">
			<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
		</svg>
		<span class="floating-btn-tooltip">의료진 문의</span>
	</a>
	<!-- Scroll to Top Button -->
	<button type="button" class="floating-btn btn-top js-btn-scroll-top" title="페이지 상단으로 이동" aria-label="페이지 상단으로 이동">
		<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="floating-btn-icon">
			<polyline points="18 15 12 9 6 15"></polyline>
		</svg>
	</button>
</div>

<style>
.sy-floating-actions {
	position: fixed;
	right: 24px;
	bottom: 24px;
	display: flex;
	flex-direction: column;
	gap: 12px;
	z-index: 1000;
}
.floating-btn {
	width: 50px;
	height: 50px;
	border-radius: 50%;
	background-color: #ffffff;
	box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
	border: 1px solid rgba(0, 0, 0, 0.05);
	display: flex;
	align-items: center;
	justify-content: center;
	cursor: pointer;
	color: #333333;
	transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
	position: relative;
	padding: 0;
}
.floating-btn:hover {
	transform: translateY(-4px);
	box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
}
.floating-btn-icon {
	width: 20px;
	height: 20px;
}
.btn-qa {
	background-color: #0b5cab;
	color: #ffffff;
	border-color: #0b5cab;
}
.btn-qa:hover {
	background-color: #084c8f;
	color: #ffffff;
}
.btn-top {
	opacity: 0;
	transform: scale(0.8) translateY(10px);
	pointer-events: none;
}
.btn-top.is-visible {
	opacity: 1;
	transform: scale(1) translateY(0);
	pointer-events: auto;
}
.btn-top:hover {
	background-color: #f8f9fa;
}
.floating-btn-tooltip {
	position: absolute;
	right: 62px;
	background-color: #333333;
	color: #ffffff;
	padding: 6px 12px;
	border-radius: 4px;
	font-size: 12px;
	font-weight: 500;
	white-space: nowrap;
	opacity: 0;
	pointer-events: none;
	transform: translateX(10px);
	transition: all 0.3s ease;
	box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}
.floating-btn-tooltip::after {
	content: '';
	position: absolute;
	left: 100%;
	top: 50%;
	transform: translateY(-50%);
	border-width: 5px;
	border-style: solid;
	border-color: transparent transparent transparent #333333;
}
.btn-qa:hover .floating-btn-tooltip {
	opacity: 1;
	transform: translateX(0);
}
@media (max-width: 768px) {
	.sy-floating-actions {
		right: 16px;
		bottom: 16px;
		gap: 8px;
	}
	.floating-btn {
		width: 44px;
		height: 44px;
	}
	.floating-btn-icon {
		width: 18px;
		height: 18px;
	}
	.floating-btn-tooltip {
		display: none;
	}
}
</style>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		var btnTop = document.querySelector('.js-btn-scroll-top');
		function checkScrollTop() {
			if (btnTop) {
				if (window.scrollY > 300) {
					btnTop.classList.add('is-visible');
				} else {
					btnTop.classList.remove('is-visible');
				}
			}
		}
		window.addEventListener('scroll', checkScrollTop, { passive: true });
		checkScrollTop();

		if (btnTop) {
			btnTop.addEventListener('click', function () {
				window.scrollTo({
					top: 0,
					behavior: 'smooth'
				});
			});
		}
	});
</script>
