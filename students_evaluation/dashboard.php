<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <img src="lr.png" class="img-responsive center-block d-block mx-auto" alt="Sample Image">
        <section class="vh-100" style="background-color: #022058;">    
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card shadow-5-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                      
      <div class="d-grid gap-2 col-6 mx-auto ">
     <button id="btnShow" type="button" class="btn btn-primary btn-lg">Export Tables</button>
    <div class="modal fade" tabindex="-1" id="testModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Export Table</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label class="form-label" for="customFile">Choose Your Excel File</label>
            <input type="file" class="form-control" id="customFile" />
          </div>
          <div class="modal-footer">
            <a class="btn btn-primary" href="Branch.php" id="btnCheck">Check</a>       
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      const container = document.getElementById("testModal");
      const modal = new bootstrap.Modal(container);

      document.getElementById("btnShow").addEventListener("click", function () {
        modal.show();
      });
      document.getElementById("btnCheck").addEventListener("click", function () {
        modal.hide();
      });
    </script>
    <a class="btn btn-primary btn-lg" type="button">CRUD</a>
    <a class="btn btn-primary btn-lg" type="button">Generate report</a>
  </div>
                    </div>
                  </div>
                  </div>
              </div>
              </div>
             </div>
      </div>
      </section>
</body>
</html>
