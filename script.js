function registerUser(event) {
  event.preventDefault();

  const username = document.getElementById("reg-username").value;
  const password = document.getElementById("reg-password").value;

  localStorage.setItem('username', username);
  localStorage.setItem('password', password);

  alert("Registration successful! Please login.");
  window.location.href = "index.html";
}

function loginUser(event) {
  event.preventDefault();

  const username = document.getElementById("login-username").value;
  const password = document.getElementById("login-password").value;

  const storedUser = localStorage.getItem('username');
  const storedPass = localStorage.getItem('password');

  if (username === storedUser && password === storedPass) {
    localStorage.setItem('loggedIn', 'true');
    window.location.href = "home.html";
  } else {
    alert("Incorrect credentials!");
  }
}

function reserveHotel() {
  window.location.href = "reservation.html";
}

function handleReservation(event) {
  event.preventDefault();
  document.getElementById("thank-you-message").style.display = "block";
  document.getElementById("reservation-form").reset();
}
