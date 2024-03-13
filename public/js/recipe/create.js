window.onload = function () {

    const steps = document.getElementById('steps');
    Sortable.create(steps, {
        animation: 100,
        handle: '.handle',
        onEnd: function () {
            let items = steps.querySelectorAll('.step');
            items.forEach(function (item, index) {
                item.querySelector('.step-number').innerHTML = '手順' + (index + 1);
            });
        }
    });

    steps.addEventListener('click', function (evt) {
        if (evt.target.classList.contains('.step-delete') || evt.target.closest('.step-delete')) {
            evt.target.closest('.step').remove();
            // 削除後ソートし直す
            let items = steps.querySelectorAll('.step');
            items.forEach(function (item, index) {
                item.querySelector('.step-number').innerHTML = '手順' + (index + 1);
            });
        }
    });


}

