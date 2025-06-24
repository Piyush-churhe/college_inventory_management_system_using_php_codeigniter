<?php $this->load->view('backend/header') ?>
        <div class="wrapper-page">
            <div class="page-title">
                <h1>Form Validation</h1>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <form class="cmxform" id="commentForm" method="get" action="">
                                    <div class="form-group">
                                        <label for="cname">Name (required, at least 5 characters)</label>
                                        <input id="cname" name="name" minlength="5" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cname">Req (required, at least 5 characters)</label>
                                          <input id="myInput" name="name" minlength="5" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cemail">E-Mail (required)</label>
                                          <input id="cemail" type="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="curl">URL (optional)</label>
                                          <input id="curl" type="url" name="url" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="ccomment">Your comment (required)</label>
                                          <textarea id="ccomment" name="comment" class="form-control" rows="7" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input class="submit btn btn-danger" type="submit" value="Submit">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<?php $this->load->view('backend/footer') ?>
 
    <script>
        $("#commentForm").validate();
        $( "#myinput" ).rules( "add", {
          required: true,
          minlength: 2,
          messages: {
            required: "Required input",
            minlength: jQuery.validator.format("Please, at least {0} characters are necessary")
          }
        });
    </script>