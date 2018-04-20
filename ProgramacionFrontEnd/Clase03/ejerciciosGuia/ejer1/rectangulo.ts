/// <reference path="./punto.ts" />
namespace Test {
    export class Rectangulo {
        private _area: number;
        private _ladoUno: number;
        private _ladoDos: number;
        private _perimetro: number;
        private _vertice1: Punto;
        private _vertice2: Punto;
        private _vertice3: Punto;
        private _vertice4: Punto;

        public constructor(v1: Punto, v3: Punto) {
            console.log(v1.GetX());
            this._vertice1 = v1;
            this._vertice2 = new Punto(v3.GetX(),this._vertice1.GetY());
            this._vertice3 = v3;
            this._vertice4 = new Punto(v1.GetX(),v3.GetY());
            this._ladoUno =(this._vertice2.GetX()-v1.GetX());
            this._ladoDos = v1.GetY() - this._vertice4.GetY();
            this._perimetro = this._ladoUno * 2 + this._ladoDos * 2;
            this._area = this._ladoUno * this._ladoDos;
        }

        public GetArea(): number {
            return this._area;
        }
        public GetPerimetro(): number {
            return this._perimetro;
        }
        public ToString(): string {
            return `${this._area}-${this._ladoUno}-${this._ladoDos}-${this._perimetro}`/* -${this._vertice1.ToString()}-${this._vertice2.ToString()}-${this._vertice3.ToString()}-${this._vertice4.ToString()} */;
        }
    }
}