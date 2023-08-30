function openWindowSave()
{
    document.querySelector('.windowOverlaySave').style.display = 'flex';
}
function closeWindowSave()
{
    document.querySelector('.windowOverlaySave').style.display = 'none';
}
function openWindowEdit()
{
    document.querySelector('.windowOverlayEdit').style.display = 'flex';
}
function closeWindowEdit()
{
    document.querySelector('.windowOverlayEdit').style.display = 'none';
}
function openWindowFetch()
{
    document.querySelector('.windowOverlayFetch').style.display = 'flex';
}
function closeWindowFetch()
{
    document.querySelector('.windowOverlayFetch').style.display = 'none';
}

function excluirLinha(id, tableNome)
{
    axios.post('/excluirLinha', { id: id, tableNome: tableNome}).then(response => { alert(response.data.message) });
    location.reload();
}

