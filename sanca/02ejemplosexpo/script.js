// Función para copiar el código
function copyCode(sectionId) {
  const code = document.querySelector(`#${sectionId} code`);
  const range = document.createRange();
  range.selectNode(code);
  window.getSelection().removeAllRanges();
  window.getSelection().addRange(range);
  try {
    document.execCommand('copy');
    alert('Código copiado al portapapeles');
  } catch (err) {
    alert('No se pudo copiar el código');
  }
  window.getSelection().removeAllRanges();
}
