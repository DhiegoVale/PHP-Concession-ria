function excluirCarro(idCarro) {
  if (idCarro > 0 && !isNaN(idCarro) ) {
      Swal.fire({
        title: 'Você deseja excluir esse item?',
        text: "Você não vai poder reverter isso?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, excluir!'
      }).then(result => {
        if (result.isConfirmed) {
         document.getElementById('idCarro').value = idCarro;
         document.getElementById('formExcluir').submit();
        } else {
          return false;
        }
      })
  }
}
