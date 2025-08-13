<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard of Simple Task Manager Application</title>
    <!-- Bootstrap CSS CDN for styling (optional, but needed for your classes) -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container mt-5">
      <div class="row mb-5 justify-content-center align-items-center">
        <h1
          class="col-10"
          style="text-align: center; font-weight: bold;"
        >
          Dashboard of Simple Task Manager Application
        </h1>
        <div class="col-2" style="border: 2px solid black;border-radius: 10px;">
          <div class="row">
            <h3 class="col-12" style="text-align: center; font-weight: lighter">
              Task Count
            </h3>
            <h1 id="task-count" class="col-12" style="text-align: center; font-weight: bold">0</h1>
          </div>
        </div>
      </div>

      <form id="task-form" class="mb-3">
        <div class="input-group">
          <input
            type="text"
            id="task-input"
            class="form-control"
            placeholder="Enter your task"
          />
          <div class="input-group-append" style="margin-left: 5px">
            <button class="btn btn-primary" type="submit">Add Task</button>
          </div>
        </div>
      </form>

      <ul id="task-list" class="list-group">
        <!-- Tasks will be rendered here dynamically -->
      </ul>
    </div>

    <!-- Toast container -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1">
      <div class="toast" role="alert" id="custom-toast">
        <div class="toast-header">
          <strong class="me-auto">Notification</strong>
          <small>just now</small>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="toast"
            aria-label="Close"
          ></button>
        </div>
        <div class="toast-body" id="toast-message"></div>
      </div>
    </div>

    <!-- Modal structure -->
    <div class="modal fade" id="custom-modal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="custom-modal-title"></h5>
            <button
              type="button"
              class="btn-close"
              aria-label="Close"
              data-bs-dismiss="modal"
            ></button>
          </div>

          <div class="modal-body" id="custom-modal-body"></div>

          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              id="custom-modal-button"
              data-bs-dismiss="modal"
            >
              Confirm
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Link to our script.js adn bootstrap js -->
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
