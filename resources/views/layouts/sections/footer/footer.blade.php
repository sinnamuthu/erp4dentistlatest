<!-- Add this to your Blade view file -->
@if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}",
        });
    </script>
@endif


@if(session('error'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ session('error') }}",
        });
    </script>
@endif

<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
  <div class="{{ (!empty($containerNav) ? $containerNav : 'container-fluid') }} d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
    {{-- <div class="mb-2 mb-md-0">
      © <script>
        document.write(new Date().getFullYear())

      </script>
      , made with ❤️ by <a href="{{ (!empty(config('variables.creatorUrl')) ? config('variables.creatorUrl') : '') }}" target="_blank" class="footer-link fw-bolder">{{ (!empty(config('variables.creatorName')) ? config('variables.creatorName') : '') }}</a>
    </div> --}}
    {{-- <div>
      <a href="{{ config('variables.licenseUrl') ? config('variables.licenseUrl') : '#' }}" class="footer-link me-4" target="_blank">License</a>
      <a href="{{ config('variables.moreThemes') ? config('variables.moreThemes') : '#' }}" target="_blank" class="footer-link me-4">More Themes</a>
      <a href="{{ config('variables.documentation') ? config('variables.documentation') : '#' }}" target="_blank" class="footer-link me-4">Documentation</a>
      <a href="{{ config('variables.support') ? config('variables.support') : '#' }}" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
    </div> --}}
  </div>
</footer>
<!--/ Footer-->
