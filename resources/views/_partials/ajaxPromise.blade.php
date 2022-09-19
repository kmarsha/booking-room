<script>
  function HitData(urlPost, dataPost, typePost) {
      return new Promise((resolve, reject) => {
          $.ajax({
              url: urlPost,
              data: dataPost,
              type: typePost,
              headers: {
                  'X-CSRF-TOKEN': "{{ csrf_token() }}"
              },
              success: (response) => {
                  resolve(response)
              },
              error: (error) => {
                  reject(error)
              }
          })
      })
  }
</script>