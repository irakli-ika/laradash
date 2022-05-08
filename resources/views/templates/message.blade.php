<div class="alert_msg absolute top-[50px] left-1/2
            -translate-x-1/2 bg-green-100 rounded-lg
            py-5 px-6 mb-4 text-base text-green-700
            mb-3" role="alert">
          {{ session()->get('message') }}
</div>

<script type="text/javascript">
    setTimeout(() => {document.querySelector('.alert_msg').style.display = 'none'; }, 3000);
</script>