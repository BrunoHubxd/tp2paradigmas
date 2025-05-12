![Imagen de WhatsApp 2025-05-05 a las 13 25 23_3675bd74](https://github.com/user-attachments/assets/8c926671-2f72-4a91-b4ce-43bfe7d80ee0)

### ---------------------------------Spring 1---------------------------------

**1er Día:**
Se hizo la organización de cómo van a ser los roles en el primer spring, quedando así al menos temporalmente.

* Bruno López: Líder
* Martín Mekekiuk: Documentador/programador
* Sebastián Casals: Programador Backend
* Leandro: Programador Frontend

**2do Día:**
Se definió el enfoque general del sistema de turnos hospitalarios, separando las funcionalidades en módulos:

1. Solicitud de turno con prioridades
2. Gestión de stock de medicamentos
3. Relaciones médico-paciente

Se discutieron los criterios de urgencia (1 a 5) y cómo estos afectarían el orden de atención de los pacientes.

**3er Día:**
Se implementó la lógica base del sistema de turnos en Python utilizando `heapq` para manejar la cola priorizada y una clase `Paciente`. Se probó en consola con varios pacientes simulados.

---

### ---------------------------------Spring 2---------------------------------

**1er Día:**
Se comenzó con la integración frontend-backend. Leandro estructuró el HTML y CSS base con una interfaz clara para el usuario. Se incluyeron secciones para solicitar turnos, consultar medicamentos y ver relaciones médico-paciente.
Mientras tanto, Sebastián adaptó la lógica del sistema para exponer una API básica (por ahora simulada en local con respuestas mockeadas en JS).

**2do Día:**
Se implementó la funcionalidad de “Solicitar turno” en la interfaz. El formulario recoge los datos del paciente y envía un `POST` vía `fetch` a `/api/turno`. Se ajustaron los valores de urgencia para permitir un rango del 1 al 5, como se pidió en la consigna.

**3er Día:**
Se implementó el endpoint simulado para buscar medicamentos (`/api/medicamento`) con verificación de stock crítico (menos de 10 unidades). La interfaz muestra el nombre y cantidad con una advertencia si hay pocos en stock.

**4to Día:**
Se trabajó en la relación médico-paciente. Se simuló la búsqueda de pacientes asignados a un médico mediante un endpoint `/api/relaciones`. Se programó una función JS que consulta por nombre de médico y devuelve los pacientes asignados.

**5to Día:**
Antes de hacer las pruebas, se reestructuró el backend pasando de python a PHP ya que es mas manejable y mas robusto para páginas web.
Luego se hicieron pruebas de integración de todas las funciones y se corrigieron errores menores en la validación de formularios y estilos visuales.

**6to Día (día de entrega):**
Se finalizó la documentación de Spring 2, se revisó todo el código, se ajustó la presentación del sistema y se dejó lista la entrega. Cada funcionalidad está conectada correctamente y simula el comportamiento esperado del sistema de gestión hospitalaria.
El equipo mantiene la misma organización y todos los miembros participaron activamente en código, pruebas y mejoras.


