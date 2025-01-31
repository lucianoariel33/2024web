// Variables globales
let contract;

// ABI del contrato
const abi = [
    {
        "inputs": [
            {
                "internalType": "string",
                "name": "_nombre",
                "type": "string"
            }
        ],
        "name": "agregarNombre",
        "outputs": [],
        "stateMutability": "nonpayable",
        "type": "function"
    },
    {
        "inputs": [],
        "name": "obtenerNombres",
        "outputs": [
            {
                "internalType": "string[]",
                "name": "",
                "type": "string[]"
            }
        ],
        "stateMutability": "view",
        "type": "function"
    }
];

// Dirección de tu contrato desplegado
const contractAddress = "0x8c8c0c50272c5A0D2972F0d3b0a6953017d23210"; // Cambia esto por la dirección correcta

// Inicializa ethers.js
async function init() {
    try {
        // Solicitar conexión a MetaMask
        if (window.ethereum) {
            const provider = new ethers.providers.Web3Provider(window.ethereum);
            await provider.send("eth_requestAccounts", []);
            const signer = provider.getSigner();
            console.log("Cuenta conectada:", await signer.getAddress());

            // Crear instancia del contrato
            contract = new ethers.Contract(contractAddress, abi, signer);
            console.log("Contrato inicializado correctamente");

            // Verificar conexión
            await verificarConexion();

            // Asignar funciones al objeto window para hacerlas globales
            window.guardarNombre = guardarNombre;
            window.obtenerNombres = obtenerNombres;
        } else {
            alert("Por favor, instala MetaMask!");
        }
    } catch (error) {
        console.error("Error al inicializar el contrato:", error);
        alert("Error al conectar con el contrato. Revisa la consola para más detalles.");
    }
}

// Función para verificar la conexión con el contrato
async function verificarConexion() {
    try {
        if (!contract) {
            console.error("El contrato no está definido");
            return;
        }
        const nombres = await contract.obtenerNombres();
        console.log("Conexión exitosa! Nombres almacenados:", nombres);
        alert("Conexión exitosa! Puedes guardar nombres.");
    } catch (error) {
        console.error("Error al verificar la conexión:", error);
        alert("Error al conectar con el contrato. Asegúrate de que esté desplegado correctamente.");
    }
}

// Función para guardar nombre
async function guardarNombre() {
    if (!contract) {
        console.error("El contrato no está inicializado. Asegúrate de que la conexión sea exitosa.");
        return;
    }
    
    const nombre = document.getElementById("nombre").value;
    if (!nombre) {
        alert("Por favor, ingresa un nombre.");
        return;
    }

    try {
        const tx = await contract.agregarNombre(nombre);
        await tx.wait();
        alert("Nombre guardado: " + nombre);
        obtenerNombres(); // Actualiza la lista
    } catch (error) {
        console.error("Error al guardar el nombre:", error);
        alert("Error al guardar el nombre. Revisa la consola para más detalles.");
    }
}

// Función para obtener nombres
async function obtenerNombres() {
    if (!contract) {
        console.error("El contrato no está inicializado. Asegúrate de que la conexión sea exitosa.");
        return;
    }

    try {
        const nombres = await contract.obtenerNombres();
        const listaNombres = document.getElementById("listaNombres");
        listaNombres.innerHTML = ""; // Limpiar la lista existente
        nombres.forEach(nombre => {
            const li = document.createElement("li");
            li.textContent = nombre;
            listaNombres.appendChild(li);
        });
    } catch (error) {
        console.error("Error al obtener los nombres:", error);
        alert("Error al obtener los nombres. Revisa la consola para más detalles.");
    }
}

// Iniciar la aplicación al cargar
window.onload = init;
