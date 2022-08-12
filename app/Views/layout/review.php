<!-- Object Rating and Review -->
<div class="card">
    <div class="card-header text-center">
        <h4 class="card-title">Rating and Review</h4>
        <?php if (logged_in() == true) : ?>
            <form class="form form-vertical" onsubmit="checkStar(event);">
                <div class="form-body">
                    <div class="star-containter mb-3">
                        <i class="fa-solid fa-star fs-4" id="star-1" onclick="setRating('1');"></i>
                        <i class="fa-solid fa-star fs-4" id="star-2" onclick="setRating('2');"></i>
                        <i class="fa-solid fa-star fs-4" id="star-3" onclick="setRating('3');"></i>
                        <i class="fa-solid fa-star fs-4" id="star-4" onclick="setRating('4');"></i>
                        <i class="fa-solid fa-star fs-4" id="star-5" onclick="setRating('5');"></i>
                        <p class="card-text" id="rateText"></p>
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
        <?php else : ?>
            <p class="card-text">Please login as user to give your rating and reviews</p>
        <?php endif; ?>
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
    function setRating(val) {
        <?php if (logged_in() == true) : ?>
            let urlNow = '<?= $url ?>'
            let url = "<?= base_url('review') ?>" + "/" + urlNow;
            let data = {
                'user_id': '<?= user()->id ?>',
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
                        currentObjectRating()
                        setStar(val)
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