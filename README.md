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

### ---------------------------------Spring 2---------------------------------

**Día 1**
Se inició la integración frontend-backend. Leandro creó una base en HTML y CSS para la interfaz, que incluye formularios para solicitar turnos, buscar medicamentos y consultar relaciones médico-paciente. Mientras tanto, Sebastián desarrolló una API básica en JS simulada localmente, conectando las secciones con respuestas mockeadas para pruebas iniciales.

**Día 2**
Se implementó en el frontend el formulario de "Solicitud de turno". Se utilizó fetch para enviar datos por POST al endpoint /api/turno. Además, se incorporó la opción de urgencia con valores entre 1 y 5, cumpliendo con los requisitos funcionales.

**Día 3**
Se programó un endpoint /api/medicamento que permite consultar medicamentos con stock crítico (< 10 unidades). Para mejorar el rendimiento de la búsqueda, se implementó un árbol AVL en PHP que permite realizar búsquedas balanceadas y eficientes. El código en PHP gestiona el nombre y descripción del medicamento, mostrando una advertencia cuando el stock es bajo.

php
Copy
Edit
$tree = new AVLTree();
$tree->insert("Paracetamol", "Fiebre y dolor");
$tree->insert("Ibuprofeno", "Antiinflamatorio");
$tree->insert("Amoxicilina", "Antibiótico");

echo "Buscar Paracetamol: " . $tree->search("Paracetamol") . "\n";
**Día 4**
Se trabajó sobre las relaciones médico-paciente. A través del endpoint /api/relaciones, se simula la consulta de pacientes asignados a cada médico. Se utilizó un grafo en PHP para representar las asignaciones entre médicos y pacientes de forma dinámica.

php
Copy
Edit
$grafo = new Grafo();
$grafo->agregarRelacion("Dr. Pérez", "Paciente1");
$grafo->agregarRelacion("Dr. Pérez", "Paciente2");
$grafo->agregarRelacion("Dr. Gómez", "Paciente3");
$grafo->mostrarAsignaciones();

**Día 5**
Para mejorar la robustez del backend, se migró de Python a PHP, priorizando estabilidad en entorno web. Se realizaron pruebas de integración entre frontend y backend, corrigiendo errores menores como validaciones incompletas y estilos visuales inconsistentes.

**Día 6** (Entrega)
Se finalizó la documentación del sprint, se revisó el código, se ajustó la presentación del sistema y se completó la entrega. El sistema simula correctamente todas las funcionalidades requeridas para la gestión hospitalaria, con una interfaz clara y lógica consistente. Todos los integrantes participaron activamente.
