export abstract class FiguraGeometrica {
    protected _color: string;
    protected _perimetro: number;
    protected _superficie: number;


    public constructor(color: string) {
        this._color = color;
    }
    protected abstract CalcularDatos(): void;
    abstract Dibujar(): string;
    public GetColor(): string {
        return this._color;
    }
    public ToString(): string {
        return +this._color + "-" + this._perimetro + "-" + this._superficie + "\n" + this.Dibujar();
    }
}


