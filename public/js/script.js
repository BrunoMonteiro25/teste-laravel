document.addEventListener('DOMContentLoaded', function () {
  var btnSalvar = document.getElementById('btn-salvar')
  var form = document.getElementById('form-usuario')

  btnSalvar.addEventListener('click', function (e) {
    e.preventDefault()

    var nomeInput = document.getElementById('nome')
    var emailInput = document.getElementById('email')
    var senhaInput = document.getElementById('senha')
    var dataNascimentoInput = document.getElementById('data_nascimento')

    var nomeError = document.getElementById('nome-error')
    var emailError = document.getElementById('email-error')
    var senhaError = document.getElementById('senha-error')
    var dataNascimentoError = document.getElementById('data-nascimento-error')

    nomeError.innerText = ''
    emailError.innerText = ''
    senhaError.innerText = ''
    dataNascimentoError.innerText = ''

    var nome = nomeInput.value.trim()
    var email = emailInput.value.trim()
    var senha = senhaInput.value.trim()
    var dataNascimento = dataNascimentoInput.value.trim()

    if (nome === '') {
      nomeError.innerText = 'Campo obrigatório*'
    }

    if (email === '') {
      emailError.innerText = 'Campo obrigatório*'
    }

    if (senha === '') {
      senhaError.innerText = 'Campo obrigatório*'
    } else if (senha.length < 8) {
      senhaError.innerText = 'A senha deve ter no mínimo 8 caracteres*'
    }

    function isValidDate(dateString) {
      var parts = dateString.split('/')
      var day = parseInt(parts[0], 10)
      var month = parseInt(parts[1], 10)
      var year = parseInt(parts[2], 10)

      if (isNaN(day) || isNaN(month) || isNaN(year)) {
        return false
      }

      var date = new Date(year, month - 1, day)
      if (
        date.getFullYear() === year &&
        date.getMonth() === month - 1 &&
        date.getDate() === day
      ) {
        return true
      }

      return false
    }

    if (dataNascimento === '' || !isValidDate(dataNascimento)) {
      dataNascimentoError.innerText = 'Digite a data no padrão - 00/00/0000*'
      console.clear()
    }

    if (nome !== '' && email !== '' && senha !== '') {
      var url = form.getAttribute('action')
      var formData = new FormData(form)

      var request = new XMLHttpRequest()
      request.open('POST', url)
      request.setRequestHeader(
        'X-CSRF-TOKEN',
        document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute('content'),
      )

      request.onload = function () {
        if (request.status >= 200 && request.status < 400) {
          var data = JSON.parse(request.responseText)
          alert('Usuário cadastrado com sucesso!')
          window.location.href = '/'
        } else {
          if (request.status === 500) {
            emailError.innerText = 'Este e-mail já está cadastrado.'
            console.clear()
          } else {
            alert('Erro ao cadastrar usuário.')
          }
        }
      }

      request.onerror = function () {
        alert('Erro de conexão.')
      }

      request.send(formData)
    }
  })
})
