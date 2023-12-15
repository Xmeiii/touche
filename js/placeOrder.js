function submitReservation() {
  // Get form data
  var customerName = document.getElementById('customerName').value;
  var reservationDate = document.getElementById('reservationDate').value;
  var numberOfPeople = document.getElementById('numberOfPeople').value;
  var contactNumber = document.getElementById('contactNumber').value;
  var specialRequests = document.getElementById('specialRequests').value;
  var successMessage = document.getElementById('reservationSuccess');
  successMessage.innerHTML = '<div class="alert alert-success">Reservation successful! We look forward to serving you.</div>';
  fetch('/your-server-endpoint', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      customerName: customerName,
      reservationDate: reservationDate,
      numberOfPeople: numberOfPeople,
      contactNumber: contactNumber,
      specialRequests: specialRequests,
    }),
  })
    .then(response => response.json())
    .then(data => {
      console.log('Success:', data);
      // You can handle the response from the server here
    })
    .catch((error) => {
      console.error('Error:', error);
      // Handle errors here
    });
}