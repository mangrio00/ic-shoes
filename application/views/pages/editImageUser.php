<div class="container" style="min-height: 25vw;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="img-profile">
                <div class="card offset-4 mt-5" style="width: 18rem;">
                    <div class="card-body">
                        <?php echo form_open_multipart('main/editImageProfile/' . $user['id_user']); ?>
                        <input type="file" name="image" class="mb-4" />
                        <br />
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center">
                                <input type="submit" value="Upload" class="btn btn-primary" />
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>