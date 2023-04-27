require('./bootstrap');
const swal       = (window.swal = require("sweetalert2"));
const deletebtns = document.getElementsByClassName("delete-btn");

Array.from(deletebtns).forEach(btn => {
    btn.addEventListener('click', () => {
        const commentId = btn.value;
        console.log("comment id", commentId);
        window.commentValue = commentId;
        swal.fire({
            title            : '確認要刪除留言？',
            showDenyButton   : true,
            confirmButtonText: '確認',
            denyButtonText   : `取消`,
            buttonsStyling   : true,
        
            customClass: {
                confirmButton: 'btn btn-swalConfirm border-0 rounded mx-2',
                denyButton   : 'btn btn-swalDeny border-0 rounded mx-2',
              },
        
            //   }).then((result) => {
            //     if (result.isConfirmed) {
            //     } else if (result.isDenied) {
            //     }
          })
    });

});


