document.addEventListener('DOMContentLoaded', function () {
      const popup = document.getElementById('popupLabel');
      const header = document.getElementById('popupHeader');
      const closeButton = document.querySelector('.btn-closed');

      let offsetX = 0,
            offsetY = 0,
            mouseX = 0,
            mouseY = 0;

      // Function to show the popup if not shown before
      if (!sessionStorage.getItem('popupShown')) {
            popup.style.display = 'block';
            sessionStorage.setItem('popupShown', 'true');
      }

      // Close button functionality
      closeButton.addEventListener('click', () => {
            popup.style.display = 'none';
      });

      // Start dragging when the header is clicked
      header.addEventListener('mousedown', startDrag);

      function startDrag(e) {
            e.preventDefault();

            // Get initial mouse position
            mouseX = e.clientX;
            mouseY = e.clientY;

            // Add mousemove and mouseup event listeners
            document.addEventListener('mousemove', dragElement);
            document.addEventListener('mouseup', stopDrag);
      }

      function dragElement(e) {
            // Calculate new cursor position
            offsetX = mouseX - e.clientX;
            offsetY = mouseY - e.clientY;

            // Update mouse position
            mouseX = e.clientX;
            mouseY = e.clientY;

            // Set the new position of the popup
            popup.style.top = (popup.offsetTop - offsetY) + "px";
            popup.style.left = (popup.offsetLeft - offsetX) + "px";
      }

      function stopDrag() {
            // Remove event listeners when dragging stops
            document.removeEventListener('mousemove', dragElement);
            document.removeEventListener('mouseup', stopDrag);
      }
});