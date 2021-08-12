require('./bootstrap');

// 確認ダイアログを、表示する
var elems = document.getElementsByClassName('confirmation');
var confirmIt = function (e) {
    if (!confirm('削除してよろしいですか？')) e.preventDefault();
};
for (var i = 0, l = elems.length; i < l; i++) {
    elems[i].addEventListener('click', confirmIt, false);
}
