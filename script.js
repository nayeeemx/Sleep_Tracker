function openModal() {
  var modal = document.getElementById("modal");
  modal.style.display = "block";
}

function closeModal() {
  var modal = document.getElementById("modal");
  modal.style.display = "none";
}

function resetForm() {
  document.getElementById("new-entry-form").reset();
  calculateSleepDuration();
}

function calculateSleepDuration() {
  var sleepHour = parseInt(document.getElementById("sleep-hour").value) || 0;
  var sleepMinute = parseInt(document.getElementById("sleep-minute").value) || 0;
  var wakeupHour = parseInt(document.getElementById("wakeup-hour").value) || 0;
  var wakeupMinute = parseInt(document.getElementById("wakeup-minute").value) || 0;

  var sleepTime = sleepHour * 60 + sleepMinute;
  var wakeupTime = wakeupHour * 60 + wakeupMinute;
  var sleepDuration = wakeupTime - sleepTime;

  if (sleepDuration < 0) {
    sleepDuration += 1440; // Add 24 hours (in minutes) if wakeup time is on the next day
  }

  var durationSpan = document.getElementById("duration");
  durationSpan.textContent = sleepDuration + " minutes";
}

document.getElementById("new-entry-form").addEventListener("submit", function (e) {
  e.preventDefault();
  // Handle form submission here
  closeModal();
});

document.getElementById("sleep-hour").addEventListener("input", calculateSleepDuration);
document.getElementById("sleep-minute").addEventListener("input", calculateSleepDuration);
document.getElementById("wakeup-hour").addEventListener("input", calculateSleepDuration);
document.getElementById("wakeup-minute").addEventListener("input", calculateSleepDuration);