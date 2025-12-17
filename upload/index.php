<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contributors Import</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Contributors Import</h2>

<label>
    Magazine Edition:
    <input type="number" id="edition" required>
</label>

<label>
    Authorisation Password:
    <input type="password" id="auth">
</label>

<form id="importForm">
<table>
    <thead>
        <tr>
            <th>Name</th>
            <?php for ($i = 1; $i <= 9; $i++): ?>
                <th>_26_<?= $i ?></th>
            <?php endfor; ?>
        </tr>
    </thead>
    <tbody>
        <?php for ($r = 0; $r < 50; $r++): ?>
        <tr>
            <td>
                <input type="text" name="name[]" class="name-input" autocomplete="off">
                <div class="suggestions"></div>
            </td>
            <?php for ($c = 1; $c <= 9; $c++): ?>
                <td><input type="number" name="_26_<?= $c ?>[]"></td>
            <?php endfor; ?>
        </tr>
        <?php endfor; ?>
    </tbody>
</table>

<button type="submit">Import Contributors</button>
</form>

<script>
document.querySelectorAll('.name-input').forEach(input => {
    input.addEventListener('input', async () => {
        const query = input.value;
        const box = input.nextElementSibling;
        if (query.length < 2) {
            box.innerHTML = '';
            return;
        }

        const res = await fetch(`suggest_names.php?q=${encodeURIComponent(query)}`);
        const names = await res.json();

        box.innerHTML = names.map(n =>
            `<div class="suggestion">${n}</div>`
        ).join('');

        box.querySelectorAll('.suggestion').forEach(div => {
            div.onclick = () => {
                input.value = div.textContent;
                box.innerHTML = '';
            };
        });
    });
});

document.getElementById('importForm').addEventListener('submit', async e => {
    e.preventDefault();

    const edition = document.getElementById('edition').value;
    const auth = document.getElementById('auth').value;

    if (!edition || !auth) {
        alert('Edition and password required');
        return;
    }

    const formData = new FormData(e.target);
    formData.append('edition', edition);
    formData.append('auth', auth);

    const res = await fetch('submit.php', {
        method: 'POST',
        body: formData
    });

    const text = await res.text();
    alert(text);
});
</script>

</body>
</html>
