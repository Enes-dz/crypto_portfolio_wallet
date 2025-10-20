document.addEventListener('DOMContentLoaded', ()=>{
    const changeButton = () => {
        console.log('change button');
        const currentPage = window.location.hash.substring(1);
        
        const buttons = document.querySelectorAll('.header-buttons-h');

        buttons.forEach(button=>{
            if(button.getAttribute('data-selected')===currentPage){
                button.classList.add('high-head-button');
            }else{
                button.classList.remove('high-head-button');
            }
        })
    }
    changeButton();
    window.addEventListener('hashchange', changeButton);
})