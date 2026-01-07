// document.addEventListener("DOMContentLoaded", () => {
//   const productForm = document.getElementById("productForm");
//   const productModal = new bootstrap.Modal(
//     document.getElementById("productModal")
//   );
//   let products = [];
//   let editingProductId = null;

//   function renderProducts() {
//     const tableBody = document.getElementById("productTableBody");
//     tableBody.innerHTML = "";
//     products.forEach((product) => {
//       const row = document.createElement("tr");
//       row.innerHTML = `
//                     <td>${product.name}</td>
//                     <td>$${product.price}</td>
//                     <td><img src="${product.img}" alt="${product.name}" style="width: 50px; height: 50px; object-fit: cover;"></td>
//                     <td>${product.category}</td>
//                     <td>${product.description}</td>
//                     <td class="text-center">
//                         <button class="btn btn-warning btn-sm edit-btn" data-id="${product.id}">Edit</button>
//                         <button class="btn btn-danger btn-sm delete-btn" data-id="${product.id}">Delete</button>
//                     </td>
//                 `;
//       tableBody.appendChild(row);
//     });
//   }

//   productForm.addEventListener("submit", (e) => {
//     e.preventDefault();

//     const name = document.getElementById("productName").value;
//     const price = document.getElementById("productPrice").value;
//     const img = document.getElementById("productImg").value;
//     const category = document.getElementById("productCategory").value;
//     const description = document.getElementById("productDescription").value;

//     if (editingProductId !== null) {
//       // Update existing product
//       const index = products.findIndex((p) => p.id === editingProductId);
//       if (index !== -1) {
//         products[index] = {
//           id: editingProductId,
//           name,
//           price,
//           img,
//           category,
//           description,
//         };
//       }
//       editingProductId = null;
//     } else {
//       // Add new product
//       const newProduct = {
//         id: Date.now(),
//         name,
//         price,
//         img,
//         category,
//         description,
//       };
//       products.push(newProduct);
//     }

//     renderProducts();
//     productModal.hide();
//     productForm.reset();
//   });

//   document.getElementById("productTableBody").addEventListener("click", (e) => {
//     const id = parseInt(e.target.getAttribute("data-id"));
//     if (e.target.classList.contains("delete-btn")) {
//       products = products.filter((product) => product.id !== id);
//       renderProducts();
//     } else if (e.target.classList.contains("edit-btn")) {
//       const productToEdit = products.find((product) => product.id === id);
//       if (productToEdit) {
//         document.getElementById("productName").value = productToEdit.name;
//         document.getElementById("productPrice").value = productToEdit.price;
//         document.getElementById("productImg").value = productToEdit.img;
//         document.getElementById("productCategory").value =
//           productToEdit.category;
//         document.getElementById("productDescription").value =
//           productToEdit.description;
//         editingProductId = productToEdit.id;
//         productModal.show();
//       }
//     }
//   });

//   document.getElementById("addNewProductBtn").addEventListener("click", () => {
//     editingProductId = null;
//     productForm.reset();
//   });
// });
