let deleteData = () => {
    Swal.fire({
        title: "دڵنیای لە سڕینەوەی؟",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "بەڵێ",
        cancelButtonText: "نەخێر"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "سڕایەوە!",
                text: ".دەیتاکە بەسەرکەوتووی سڕدرایەوە",
                icon: "success",
            });
            setTimeout(() => {
                document.getElementById('deleteForm').submit();
            }, 1000);
        }
    });
}
