// Create a simple React component
function App() {
    const [products, setProducts] = React.useState(window.products); 
    const [carts, setCarts] = React.useState([]);
    

    React.useEffect(()=>{
        console.log('mounted')
        console.log(products); 
    }, [])

    // const [carts, setCarts] = React.useState([
    //     { name: 'Apple Ceda Viniger 20% of Oil with greese', qty: 2, price: 1.50 },
    //     { name: 'Banana', qty: 5, price: 0.75 },
    //     { name: 'Cherry', qty: 8, price: 2.00 },
    //     { name: 'Date', qty: 3, price: 1.25 },
    //     { name: 'Eggplant', qty: 4, price: 1.10 },
    //     { name: 'Fig', qty: 6, price: 1.90 },
    //     { name: 'Grape', qty: 100, price: 0.40 },
    //     { name: 'Honeydew', qty: 1, price: 3.20 },
    //     { name: 'Iced Tea', qty: 7, price: 1.75 },
    //     { name: 'Jam', qty: 2, price: 2.50 }
    // ]);
    

    return (
        <div className="container-fluid">
            <div className="row">
                <div className="col-3">
                    <SalesContainer carts={carts} setCarts={setCarts}/>
                </div>
                <div className="col-9">
                    <ProductContainer products={products} setProducts={setProducts}/>
                </div>
            </div>
        </div>
    );
}



function SalesContainer({carts, setCarts}) {
    const [total, setTotal] = React.useState(0); 
    const [totalCost, setTotalCost] = React.useState(0); 
    const [vat, setVat] = React.useState(7.5); //%
    const [fee, setFee] = React.useState(100); //fixed value
    const paymentType = ['Cash', 'POS', 'Bank Transfer'];

    const Item = ({item})=>{
        return (
            <>
            <div className="cart_item_con">
                <div className="rowed">
                    <div className="rowed_one">
                        {item.name}
                        <div style={{ fontSize: '12px', fontWeight: 'bold' }}>₦{item.price}</div>
                    </div>
                    <div className="rowed_two">
                        <div>
                            <span>x</span> {' '}
                            <input min={1} placeholder="QTY" style={{ width: '50px', fontSize: '12px', borderColor:'#eee' }} type="number" step={1} />
                        </div>
                    </div>
                </div>
            </div>
            </>
        );
    }
    return (
        <>
            <div className="cart_item_container">
                {
                    carts.map((item, index)=>{
                        return <Item key={index} item={item} />
                    })
                }
            </div>
            <div>
                <table className="table table-bordered" style={{marginBottom:0}}>
                    <tbody>
                        <tr>
                            <th>Total</th>
                            <th>₦{total.toLocaleString()}</th>
                        </tr>
                        <tr>
                            <th>VAT</th>
                            <th>{vat}%</th>
                        </tr>
                        <tr>
                            <th>Service Charge</th>
                            <th>₦{fee}</th>
                        </tr>
                        <tr>
                            <th>Total Cost</th>
                            <th>₦{totalCost.toLocaleString()}</th>
                        </tr>
                    </tbody>
                </table>

                <div>
                    <select className="w-100 p-3">
                        <option>Select Payment Method</option>
                        {
                            paymentType.map((method, key)=><option key={key} value={method}>{method}</option>)
                        }
                    </select>
                </div>
                <div>
                    <button className="btn btn-primary w-100">Finish Order</button>
                </div>
            </div>
        </>
    ); 
}


function ProductContainer({products, setProducts}) {
    return (
        <>
            <div>
                <div className="search_con">                
                    <input className="form-control" placeholder="Search Product"/>
                </div>
                <div className="row">
                    {
                        products.map((product, index)=>{
                            return (
                                <div key={index} className="col-md-3">
                                    <div className="product_list">
                                        <h6>{product.name}</h6>
                                        <div>₦{Number(product.selling_price).toLocaleString()}</div>
                                    </div> 
                                </div>
                            )
                        })
                    }
                </div>
            </div>
        </>
    ); 
}


// Render the component to the DOM
const rootElement = document.getElementById('root');
const root = ReactDOM.createRoot(rootElement);
root.render(<App />);