namespace Test {
    export class Punto {
        private _x: number;
        private _y: number;

        public constructor(x: number, y: number) {
            this._x = x;
            this._y = y;
        }
        public GetX(): number {
            return this._x;
        }

        public GetY(): number {
            return this._y;
        }
        public ToString(): string {
            return this._x + "-" + this._y;
        }
    }




}
