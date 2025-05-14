![Captura de pantalla -2025-05-14 10-05-04](https://github.com/user-attachments/assets/ee9c5681-c9ab-4113-9b14-7d0443ed177f)

### ---------------------------------Spring 1---------------------------------

**1er Día:**
Se hizo la organización de cómo van a ser los roles en el primer spring, quedando así al menos temporalmente.

* Bruno López: Líder/Tester
* Martín Mekekiuk: Documentador/Programador
* Sebastián Casals: Programador Backend
* Leandro: Programador Programador Frontend

**2do Día:**
Se definió el enfoque general del sistema de turnos hospitalarios, separando las funcionalidades en módulos:

1. Solicitud de turno con prioridades
2. Gestión de stock de medicamentos
3. Relaciones médico-paciente

Se discutieron los criterios de urgencia (1 a 5) y cómo estos afectarían el orden de atención de los pacientes.

**3er Día:**
Se implementó la lógica base del sistema de turnos en Python utilizando `heapq` para manejar la cola priorizada y una clase `Paciente`. Se probó en consola con varios pacientes simulados.

### ---------------------------------Sprint 2---------------------------------

**Día 1**
Se inició la integración frontend-backend. Leandro creó la base de la interfaz en HTML, con formularios para solicitar turnos. Mientras tanto, Sebastián programó el backend en PHP, separando la lógica en clases reutilizables (`Paciente`, `Turnero`, `AVLTree`, `Grafo`). Se estableció una estructura ordenada de carpetas: `frontend/`, `backend/classes/`.

**Día 2**
Se implementó el formulario "Solicitud de Turno" usando `fetch()` para enviar los datos al archivo PHP `sistema_turnos.php`. Los datos se reciben como JSON, procesan con `Turnero.php` y se guarda la sesión con el turno asignado.

**Día 3**
Se programó un sistema de stock de medicamentos. Se utilizó un árbol AVL (`AVLTree.php`) para realizar búsquedas eficientes. Si un medicamento tiene stock menor a 10 unidades, se muestra una advertencia. La simulación se realiza en consola o mediante una función futura en frontend.

    "php"
    $tree = new AVLTree();
    $tree->insert("Paracetamol", "Fiebre y dolor");
    $tree->insert("Ibuprofeno", "Antiinflamatorio");
    echo "Buscar Paracetamol: " . $tree->search("Paracetamol") . "\n";

**Día 4**
Se desarrolló un grafo simple (Grafo.php) para modelar relaciones entre médicos y pacientes. Cada médico puede tener múltiples pacientes asignados. Se simula la funcionalidad de /api/relaciones.

    "php"
    $grafo = new Grafo();
    $grafo->agregarRelacion("Dr. Pérez", "Paciente1");
    $grafo->agregarRelacion("Dr. Gómez", "Paciente2");
    $grafo->mostrarAsignaciones();

**Día 5**
Día 5
Para mejorar la robustez del backend, se migró de Python a PHP, priorizando estabilidad en entorno web. Se realizaron pruebas de integración frontend-backend, corrigiendo errores menores y validaciones. Se añadió persistencia usando sesiones PHP.

**Día 6**
Se finalizó la documentación del sprint, se revisó el código, se ajustó la presentación del sistema y se completó la entrega. El sistema simula correctamente todas las funcionalidades requeridas, con una interfaz clara y lógica consistente. Todos los integrantes participaron activamente.


····Explicación de conexiones entre archivos····

-*frontend/index.html**

    Es la interfaz visual.

    Tiene un formulario para solicitar turnos y un botón para llamar al siguiente paciente.

    Usa fetch() para enviar datos en formato JSON al backend (sistema_turnos.php).

-*backend/sistema_turnos.php**

    Recibe las solicitudes del frontend mediante POST.

    Usa $_SESSION para mantener persistente la instancia del Turnero.

    Dependencias:

        Turnero.php → contiene la lógica de turnos.

        Paciente.php → define la clase del paciente.

    Funciones:

        accion = solicitar → agrega el paciente a la cola priorizada.

        accion = llamar → extrae al siguiente paciente según urgencia.

-*backend/classes/Paciente.php**

    Define la clase Paciente con nombre, DNI y nivel de urgencia.

-*backend/classes/Turnero.php**

    Administra la cola de turnos con prioridades (urgencia más alta tiene mayor prioridad).

    Usa SplPriorityQueue de PHP.

    Funciones:

        solicitarTurno(Paciente) → lo encola.

        llamarSiguiente() → retorna el paciente más urgente.

        hayTurnos() → indica si hay pacientes esperando.

-*backend/classes/AVLTree.php + Medicamento.php**

    Permiten insertar y buscar medicamentos en un árbol AVL.

    La búsqueda es rápida y balanceada.

    Se simula el endpoint /api/medicamento.

-*backend/classes/Grafo.php**

    Permite agregar relaciones entre médicos y pacientes.

    Se utiliza en /api/relaciones.

### ---------------------------------Sprint 3---------------------------------
## ✅ Ideas para funcionalidades Sprint 3

1. ✅ **Historial de pacientes atendidos** (guardarlos en archivo o base de datos).
2. ✅ **Login médico / administrativo** para ver panel distinto.
3. ✅ **Filtro de turnos por urgencia en pantalla**.
4. ✅ **Formulario para registrar medicamentos** (cargar más en el AVL).
5. ✅ **Interfaz visual del grafo** (mostrar relaciones con JavaScript tipo Graphviz).
6. ✅ **Contador de turnos atendidos por día**.
7. ✅ **Simulación multiconsultorio**: atender pacientes por médico.
