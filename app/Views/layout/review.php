<!-- Object Rating and Review -->
<div class="card">
    <div class="card-header text-center">
        <h4 class="card-title">Rating and Review</h4>
        <?php if (logged_in() == true) : ?>
            <form class="form form-vertical" id="formReview" method="POST">
                <div class="form-body">
                    <div class="star-containter mb-3">
                        <i class="fa-solid fa-star fs-5" id="star-1" onclick="setRating('<?= user()->id ?>','<?= $objectData->id; ?>','1','<?= $url ?>');"></i>
                        <i class="fa-solid fa-star fs-5" id="star-2" onclick="setRating('<?= user()->id ?>','<?= $objectData->id; ?>','2','<?= $url ?>');"></i>
                        <i class="fa-solid fa-star fs-5" id="star-3" onclick="setRating('<?= user()->id ?>','<?= $objectData->id; ?>','3','<?= $url ?>');"></i>
                        <i class="fa-solid fa-star fs-5" id="star-4" onclick="setRating('<?= user()->id ?>','<?= $objectData->id; ?>','4','<?= $url ?>');"></i>
                        <i class="fa-solid fa-star fs-5" id="star-5" onclick="setRating('<?= user()->id ?>','<?= $objectData->id; ?>','5','<?= $url ?>');"></i>
                        <p class="card-text" id="rateText"></p>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;" name="comment" required></textarea>
                            <label for="floatingTextarea">Leave a comment here</label>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end mb-3">
                        <input type="hidden" name="user_id" value="<?= user()->id ?>">
                        <input type="hidden" name="object_id" value="<?= $objectData->id ?>">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    </div>
                </div>
            </form>
        <?php else : ?>
            <p class="card-text">Please login as user to give your rating or reviews</p>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="reviews">
                <tbody id="commentBody">
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    let urlNow = '<?= $url ?>'
    getObjectComment()

    function getObjectComment() {
        $.ajax({
            url: "<?= base_url() ?>" + "/" + "review" + "/" + "get_" + urlNow + "_comment",
            method: "GET",
            data: {
                'object_id': '<?= $objectData->id ?>'
            },
            dataType: "json",
            success: function(response) {
                if (response) {
                    $('#commentBody').html('')
                    for (i in response) {
                        $('#commentBody').prepend(`<tr><td><p class="mb-0">${response[i].name}</p><p class="fw-light">${response[i].date}</p><p class="fw-bold">${response[i].comment}</p></td></tr>`);
                    }
                }
            }
        });
    }
    $("#formReview").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url() ?>" + "/" + "review" + "/" + "comment_" + urlNow,
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                document.getElementById("formReview").reset();
                getObjectComment()
            }
        });
    });
</script>