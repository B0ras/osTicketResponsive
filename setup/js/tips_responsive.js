

var getHelpTips = (function () {
    var dfd = $.Deferred();
    return function () {
        if (dfd.state() != "resolved")
            $.ajax({
                url: "ajax.php/help/tips/install",
                dataType: "json",
                success: function (json_config) {
                    dfd.resolve(json_config);
                },
            });
        return dfd;
    };
})();

// const buttons = $(".tip").toArray();
// for (const button of buttons) {
//     button.data("block", "something");
// }

const buttons = document.querySelectorAll(".tip")

getHelpTips().then((tips) => {
    for (const button of buttons) {
        // console.log(`ID: ${button.id}`)
        const { title, content, links } = tips[button.id]
        button.setAttribute("data-bs-title", title)

        const text = $.parseHTML(content)[0].innerText + (links ? `\n See more at: \n${links[0]}` : ``)

        button.setAttribute("data-bs-content", text)
    }

    const popoverTriggerList = document.querySelectorAll(
        '[data-bs-toggle="popover"]'
    );
    const popoverList = [...popoverTriggerList].map(
        (popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl)
    );

    console.table(tips)
})