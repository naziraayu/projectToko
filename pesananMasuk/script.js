function toggleDropdown() {
    const dropdownList = document.querySelector('.dropdown-list');
    dropdownList.classList.toggle('show');
}
  
function selectOption(option) {
    const selectedText = document.querySelector('.select');
    selectedText.textContent = option.textContent;
    const dropdownList = document.querySelector('.dropdown-list');
    dropdownList.classList.remove('show');
}
