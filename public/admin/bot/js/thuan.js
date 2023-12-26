document.addEventListener("DOMContentLoaded", function() {
    // Lấy tất cả các phần tử .megamenu-item
    var megamenuItems = document.querySelectorAll('.sidebar-menu .megamenu-item');

    // Biến lưu trữ item hiện tại
    var currentMegamenuItem = null;

    // Lặp qua từng phần tử
    megamenuItems.forEach(function(item) {
        var megamenuLink = item.querySelector('.megamenu-link');
        var megamenuContent = item.querySelector('.megamenu-content');

        // Thêm sự kiện mouseover
        megamenuLink.addEventListener('mouseover', function() {
            // Kiểm tra nếu có item hiện tại, thì đặt lại trạng thái của nó
            if (currentMegamenuItem) {
                resetMegamenuItem(currentMegamenuItem);
            }

            // Lưu trạng thái của item hiện tại
            currentMegamenuItem = item;

            // Thêm class 'hover' cho megamenu-link
            megamenuLink.classList.add('hover');

            // Thay đổi class cho megamenu-content
            megamenuContent.classList.add('menu-hover');

            // Thay đổi style display cho megamenu-content thành 'flex'
            megamenuContent.style.display = 'flex';
        });

        // Thêm sự kiện mouseleave cho .megamenu-content
        megamenuContent.addEventListener('mouseleave', function() {
            // Xóa class 'hover' cho megamenu-link
            megamenuLink.classList.remove('hover');

            // Xóa class cho megamenu-content
            megamenuContent.classList.remove('menu-hover');

            // Thay đổi style display cho megamenu-content thành 'none'
            megamenuContent.style.display = 'none';

            // Đặt lại item hiện tại về null
            currentMegamenuItem = null;
        });
    });

    // Hàm để đặt lại trạng thái của một megamenu-item
    function resetMegamenuItem(item) {
        var link = item.querySelector('.megamenu-link');
        var content = item.querySelector('.megamenu-content');

        // Xóa class 'hover' cho megamenu-link
        link.classList.remove('hover');

        // Xóa class cho megamenu-content
        content.classList.remove('menu-hover');

        // Thay đổi style display cho megamenu-content thành 'none'
        content.style.display = 'none';
    }
});

