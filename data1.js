document.querySelectorAll('input[name="is_aset"]').forEach((radio) => {
  radio.addEventListener("change", function () {
    document.getElementById("kibField").style.display =
      this.value === "1" ? "block" : "none";
  });
});
