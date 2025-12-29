<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl">
        <div
            class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
            <div class="text-body">
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by <a href="{{ config('variables.creatorUrl') ? config('variables.creatorUrl') : '' }}" target="_blank" class="footer-link">{{ config('variables.creatFor') ? config('variables.creatFor') : '' }}</a>
            </div>
            <div class="d-none d-lg-inline-block">
                <a href="#!" class="footer-link me-4" onclick="clearCache('{{ route('clear_cache') }}')">@lang('general.Clear Cache')</a>
            </div>
        </div>
    </div>
</footer>
