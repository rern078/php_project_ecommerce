<!-- Bootstrap Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Popup Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-center">
                        <img id="popupImage" src="" alt="Popup" class="img-fluid">
                        <p id="imageDescription" class="mt-3"></p>
                  </div>
            </div>
      </div>
</div>

<script>
      $(document).ready(function() {
            // AJAX request to get image data on page load
            $.ajax({
                  url: 'get_image.php', // PHP file to fetch image from DB
                  method: 'GET',
                  success: function(response) {
                        const data = JSON.parse(response);
                        if (data.image_url) {
                              // Set the image URL and description in the modal
                              $('#popupImage').attr('src', data.image_url);
                              $('#imageDescription').text(data.description);
                              // Show the modal on page refresh
                              $('#imageModal').modal('show');
                        }
                  },
                  error: function() {
                        console.log('Failed to load image data.');
                  }
            });
      });
</script>