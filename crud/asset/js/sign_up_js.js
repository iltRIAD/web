function ajax(event) {
  event.preventDefault();
  let name = document.getElementById("name_id").value;
  let password = document.getElementById("pass_id").value;
  let confirm_password = document.getElementById("con_pass_id").value;
  let email = document.getElementById("email_id").value;
  let age = document.getElementById("age_id").value;

  let xhttp = new XMLHttpRequest();
  xhttp.open("post", "../controller/reg_check.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(
    "name=" +
      name +
      "&password=" +
      password +
      "&confirm_password=" +
      confirm_password +
      "&email=" +
      email +
      "&age=" +
      age
  );

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //alert(this.responseText);
      document.getElementById("change_ajax").innerHTML = this.responseText;
    }
  };

  // document.getElementById("change_ajax").innerText = "hekki";
}
