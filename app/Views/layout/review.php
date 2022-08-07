<!-- Object Rating and Review -->
<div class="card">
    <div class="card-header text-center">
        <h4 class="card-title">Rating and Review</h4>
        <form class="form form-vertical" onsubmit="checkStar(event);">
            <div class="form-body">
                <div class="star-containter mb-3">
                    <i class="fa-solid fa-star fs-4" id="star-1" onclick="setStar('star-1');"></i>
                    <i class="fa-solid fa-star fs-4" id="star-2" onclick="setStar('star-2');"></i>
                    <i class="fa-solid fa-star fs-4" id="star-3" onclick="setStar('star-3');"></i>
                    <i class="fa-solid fa-star fs-4" id="star-4" onclick="setStar('star-4');"></i>
                    <i class="fa-solid fa-star fs-4" id="star-5" onclick="setStar('star-5');"></i>
                    <input type="hidden" id="star-rating" value="0" name="rating">
                </div>
                <div class="col-12 mb-3">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;" name="comment"></textarea>
                        <label for="floatingTextarea">Leave a comment here</label>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end mb-3">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                </div>
            </div>
        </form>
        <p class="card-text">Please login as User to give Rating and review</p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="reviews">
                <tbody>
                    <tr>
                        <td>
                            <p class="mb-0">Nama Akun</p>
                            <p class="fw-light">2022-07-12</p>
                            <p class="fw-bold">Rerum sed consectetur.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="mb-0">Nama Akun 2</p>
                            <p class="fw-light">2022-07-12</p>
                            <p class="fw-bold">Rerum sed consectetur.</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    // Set star by user input
    function setStar(star) {
        <?php if (logged_in() == false) : ?>
            return Swal.fire({
                text: 'Please login first to give a like',
                icon: 'warning',
                showClass: {
                    popup: 'animate__animated animate__fadeInUp'
                },
                confirmButtonText: 'Login',
            }).then((result) => {
                if (result.isConfirmed) {
                    return window.location.href = '<?= base_url('login'); ?>'
                }
            })
        <?php else : ?>
            switch (star) {
                case 'star-1':
                    $("#star-1").addClass('star-checked');
                    $("#star-2,#star-3,#star-4,#star-5").removeClass('star-checked');
                    document.getElementById('star-rating').value = '1';
                    break;
                case 'star-2':
                    $("#star-1,#star-2").addClass('star-checked');
                    $("#star-3,#star-4,#star-5").removeClass('star-checked');
                    document.getElementById('star-rating').value = '2';
                    break;
                case 'star-3':
                    $("#star-1,#star-2,#star-3").addClass('star-checked');
                    $("#star-4,#star-5").removeClass('star-checked');
                    document.getElementById('star-rating').value = '3';
                    break;
                case 'star-4':
                    $("#star-1,#star-2,#star-3,#star-4").addClass('star-checked');
                    $("#star-5").removeClass('star-checked');
                    document.getElementById('star-rating').value = '4';
                    break;
                case 'star-5':
                    $("#star-1,#star-2,#star-3,#star-4,#star-5").addClass('star-checked');
                    document.getElementById('star-rating').value = '5';
                    break;
            }
            let starValue = document.getElementById('star-rating').value
            setRating(starValue)
        <?php endif; ?>
    }

    function setRating(val) {
        <?php if (logged_in() == true) : ?>
            let urlNow = '<?= $url ?>'
            let url = "<?= base_url('review') ?>" + "/" + urlNow;
            let data = {
                'user_id': '<?= user()->id ?>',
                'comment': '',
                'rating': val
            }
            if (urlNow == 'atraction') {
                data.atraction_id = '<?= $objectData->id; ?>'
            } else if (urlNow == 'event') {
                data.event_id = '<?= $objectData->id; ?>'
            }
            $.ajax({
                url: url,
                method: "post",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response) {
                        avgRating()
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" +
                        xhr.responseText + "\n" + thrownError);
                }
            });
        <?php endif; ?>
    }
</script>