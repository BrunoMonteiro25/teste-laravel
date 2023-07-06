document.addEventListener('DOMContentLoaded', function () {
  var btnSalvar = document.getElementById('btn-salvar')
  var form = document.getElementById('form-usuario')

  btnSalvar.addEventListener('click', function (e) {
    e.preventDefault()

    var url = form.getAttribute('action')
    var formData = new FormData(form)

    var request = new XMLHttpRequest()
    request.open('POST', url)
    request.setRequestHeader(
      'X-CSRF-TOKEN',
      document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    )

    request.onload = function () {
      if (request.status >= 200 && request.status < 400) {
        var data = JSON.parse(request.responseText)
        alert('Usuário cadastrado com sucesso!')
        window.location.href = '/'
      } else {
        alert('Erro ao cadastrar usuário.')
      }
    }

    request.onerror = function () {
      alert('Erro de conexão.')
    }

    request.send(formData)
  })
})
