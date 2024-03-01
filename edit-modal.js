var editButton = document.querySelectorAll(".edit-button");
var dltButton = document.querySelectorAll(".dlt-button");

editButton.forEach((ele) => {
  ele.addEventListener("click", (e) => {
    tr = e.target.parentElement.parentElement;

    let title = tr.childNodes[3].innerHTML;
    let description = tr.childNodes[5].innerHTML;
    let sno = tr.childNodes[1].getAttribute("sno");

    let descEdit = document.getElementById("desc-edit");
    let titleEdit = document.getElementById("title-edit");
    let snoEdit = document.getElementById("sno-edit");

    console.log(`TITLE = ${title} DESCRIPTION = ${description} SNO = ${sno}`);

    descEdit.value = description;
    titleEdit.value = title;
    snoEdit.value = sno;

    $("#exampleModal").modal("show");
  });
});

dltButton.forEach((ele) => {
  ele.addEventListener("click", (e) => {
    tr = e.target.parentElement.parentElement;
    sno = tr.childNodes[1].getAttribute("sno");

    console.log(sno);

    if (confirm("Press a button!!!")) {
      console.log("yes");
      window.location = `/Notes/index.php?delete=${sno}`;
    } else {
      console.log("no");
    }
  });
});
