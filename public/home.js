
// Logic for selection category from searchbar
const select = document.getElementById("SelectCategory");
const submitBtn = document.getElementById("submit-btn");
console.log("ciao");
submitBtn.addEventListener("click", () => {
    const selectedValue = select.value;
    if (selectedValue != "") {
        window.location.href = `/categoria/${selectedValue}`;
    }
});
