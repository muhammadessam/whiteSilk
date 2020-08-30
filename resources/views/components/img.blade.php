


<div class="custom-file-container" data-upload-id="img_temp">
    <label>اختر صورة<a href="javascript:void(0)" class="custom-file-container__image-clear" title="حذف">x</a></label>
    <label class="custom-file-container__custom-file">
        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="img_temp">
        <input type="hidden"/>
        <span class="custom-file-container__custom-file__custom-file-control"></span>
    </label>
    <div class="custom-file-container__image-preview"></div>
</div>

@section('js')
    <script>
        firstUpload = new FileUploadWithPreview('img_temp')
    </script>
@endsection
