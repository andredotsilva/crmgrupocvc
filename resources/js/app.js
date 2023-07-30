import { Select, initTE } from "tw-elements";
initTE({ Select });

const multiSelect = document.querySelector("#multiSelection");
const multiSelectInstance = Select.getInstance(multiSelect);
multiSelectInstance.setValue(["3", "4", "5"]);

import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

