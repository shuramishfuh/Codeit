// compare version of current installation with the one on github
// inform the user of any update if github version is different
//
$(document).ready(function () {
  var current = $.get("./version/version-info.json"),
    github = $.get(
      ""
    );

  current.then(function (curr) {
    github.then(function (repo) {
      if (typeof curr == "string") curr = JSON.parse(curr);
      if (typeof repo == "string") repo = JSON.parse(repo);

      if (repo.version_number > curr.version_number) {
        // theres been an update, inform user

        // display changes
        repo.changes.forEach(function (v) {
          $(".alert-info.version .update-list").append("<li>" + v + "</li>");
        });

        $("span#version").html("(" + repo.sem_ver + ")");

        // display the alert
        $(".alert-info.version").show();
      }
    });
  });
});
