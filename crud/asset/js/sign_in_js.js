function ajax(event) {
  event.preventDefault();
  let name = document.getElementById("name_id").value;
  let password = document.getElementById("pass_id").value;

  let xhttp = new XMLHttpRequest();
  xhttp.open("post", "../controller/login_check.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("name=" + name + "&password=" + password);

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //alert(this.responseText);
      if (this.responseText === "success") {
        window.location.href = "../view/home.php";
      } else {
        document.getElementById("change_ajax").innerHTML = this.responseText;
      }
    }
  };

  // document.getElementById("change_ajax").innerText = "hekki";
}
