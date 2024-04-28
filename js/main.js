  document.addEventListener("DOMContentLoaded", function() {
    const izinRadio = document.getElementById("izin");
    const hadirRadio = document.getElementById("hadir");
    const reasonContainer = document.getElementById("reason-container");
    const adminLink = document.getElementById("admin-link");

    izinRadio.addEventListener("change", function() {
      if (izinRadio.checked) {
        reasonContainer.style.display = "block";
      } else {
        reasonContainer.style.display = "none";
      }
    });

    hadirRadio.addEventListener("change", function() {
      if (hadirRadio.checked) {
        reasonContainer.style.display = "none";
      }
    });
  });

  

