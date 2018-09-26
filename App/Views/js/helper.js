String.prototype.replaceAll = function(searchStr, replaceStr) {
    let str = this;
    if(str.indexOf(searchStr) === -1) {
        return str;
    }
    return (str.replace(searchStr, replaceStr)).replaceAll(searchStr, replaceStr);
};

class view
{

    constructor(data){
        this.data = data;
    }

    dataBindSimulator(object, target) {
        $(target).html(this.data);
        let newHtml = $(target).html();
        for(let x in object){
            newHtml = newHtml.replaceAll('{{' + x + '}}', object[x]);
        }
        $(target).html(newHtml);
    }

}