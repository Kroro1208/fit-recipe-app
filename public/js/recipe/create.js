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
            evt.target.closest('.step').remove(); // 親要素ごと削除する
            // 削除後は番号をソートし直す
            let items = steps.querySelectorAll('.step');
            items.forEach(function (item, index) {
                item.querySelector('.step-number').innerHTML = '手順' + (index + 1);
            });
        }
    });

    let addStep = document.getElementById('add-step');
    addStep.addEventListener('click', function () {

        let stepCount = steps.querySelectorAll('.step').length; // 何枚手順カードがあるかを取得

        let step = document.createElement('div');
        step.classList.add('step');
        step.classList.add('flex');
        step.classList.add('justy-between');
        step.classList.add('items-center');
        step.classList.add('mb-4');

        step.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="handle w-10 h-10 mr-2 cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
        <p class="step-number w-16">手順 ${stepCount + 1}</p>
        <input type="text" name="steps[]" placeholder="レシピの作り方を入力してください" class="border border-gray-300 py-2 w-full rounded-xl">                        
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="step-delete w-6 h-6 ml-3 cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
        </svg>
        `;

        steps.appendChild(step);

    });



}

