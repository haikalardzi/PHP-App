//debounce function utility
function debounce(func, delay=1000){
    let timer = null;
    return (...args) => {
        clearTimeout(timer);
        timer = setTimeout(() => func.apply(this, args), delay);
    };
}
